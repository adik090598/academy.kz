<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizCompetitionWebForm;
use App\Http\Requests\Web\V1\QuizCompetitionWebRequest;
use App\Http\Requests\Web\V1\QuizEditWebRequest;
use App\Models\Entities\Category;
use App\Models\Entities\Quiz;
use App\Models\Entities\QuizDocument;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizCompetitionController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->where('category_id', Category::COMPETITION)->paginate(10);
        $quiz_web_form = QuizCompetitionWebForm::inputGroups(null);
        return $this->adminPagesView('competition.index', compact('quizzes', 'quiz_web_form'));
    }

    public function create()
    {
        $quiz_web_form = QuizCompetitionWebForm::inputGroups(null);
        return $this->adminPagesView('competition.create', compact('quiz_web_form'));
    }

    public function store(QuizCompetitionWebRequest $request)
    {
        $documents = [];
        try {
            $now = now();
            DB::beginTransaction();
            $path = $this->fileService->store($request->image, Quiz::IMAGE_DIRECTORY);
            $quiz = Quiz::create([
                'name' => $request->name,
                'image_path' => $path,
                'description' => $request->description,
                'category_id' => Category::COMPETITION,
            ]);
            foreach ($request->documents as $document) {
                $documents[] = [
                    'quiz_id' => $quiz->id,
                    'path' => $this->fileService->store($document, Quiz::DOCUMENT_DIRECTORY),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            QuizDocument::insert($documents);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            if ($path) $this->fileService->remove($path);
            if($documents) {
                foreach ($documents as $document) {
                    $this->fileService->remove($document['path']);
                }
            }
            throw new WebServiceExplainedException($exception->getMessage());
        }
        $this->added();
        return redirect()->route('competition.index');
    }

    public function edit(QuizEditWebRequest $request)
    {
        $quiz = Quiz::find($request->id);
        $quiz_web_form = QuizCompetitionWebForm::inputGroups($quiz);
        return $this->adminPagesView('competition.edit', compact('quiz_web_form', 'quiz'));
    }

    public function update(QuizCompetitionWebRequest $request)
    {
        $now = now();
        $quiz = Quiz::find($request->id);
        $old_path = $quiz->image_path;
        $documents = [];
        $deleted_paths = [];
        $path = null;
        if ($request->image) {
            $path = $this->fileService->updateWithRemoveOrStore($request->image, Quiz::IMAGE_DIRECTORY, $old_path);
        }
        try {
            DB::beginTransaction();
            $quiz->update([
                'name' => $request->name,
                'image_path' => $path ? $path : $old_path,
                'description' => $request->description,

            ]);
            if($request->documents) {
                foreach ($quiz->documents as $document) {
                    $deleted_paths[] = $document->path;
                }

                $quiz->documents()->delete();

                foreach ($request->documents as $document) {
                    $documents[] = [
                        'quiz_id' => $quiz->id,
                        'path' => $this->fileService->store($document, Quiz::DOCUMENT_DIRECTORY),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
            QuizDocument::insert($documents);
            $this->edited();
            DB::commit();
            foreach ($deleted_paths as $path) {
                $this->fileService->remove($path);
            }
            return redirect()->route('competition.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            if ($path) $this->fileService->remove($path);
            if($documents) {
                foreach ($documents as $document) {
                    $this->fileService->remove($document['path']);
                }
            }
            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function delete(QuizEditWebRequest $request)
    {
        $quiz = Quiz::where('id', $request->id)->with('documents')->first();
        foreach ($quiz->documents as $document) {
            $this->fileService->remove($document->path);
        }
        $this->fileService->remove($quiz->image_path);
        $quiz->documents()->delete();
        $quiz->delete();
        $this->deleted();
        return redirect()->route('competition.index');
    }
}

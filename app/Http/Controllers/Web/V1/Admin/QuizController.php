<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Forms\Web\V1\QuestionWebForm;
use App\Http\Requests\Web\V1\QuizEditWebRequest;
use App\Http\Requests\Web\V1\QuizWebRequest;
use App\Models\Entities\Category;
use App\Models\Entities\Quiz;
use App\Models\Entities\Question;
use App\Models\Entities\Answer;
use App\Models\Entities\QuizDocument;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->where('category_id', '!=', Category::COMPETITION)->paginate(10);
        $quiz_web_form = QuizWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.index', compact('quizzes', 'quiz_web_form'));
    }

    public function create() {
        $quiz_web_form = QuizWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.create', compact( 'quiz_web_form'));
    }

    public function store(QuizWebRequest $request)
    {
        $now = now();
        $documents = [];

        try {
            $path = $this->fileService->store($request->image, Quiz::IMAGE_DIRECTORY);

            $first_place_certificate_path = $this->fileService->store($request->first_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
            $second_place_certificate_path = $this->fileService->store($request->second_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
            $third_place_certificate_path = $this->fileService->store($request->third_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
            $default_certificate_path = $this->fileService->store($request->default_certificate,
                Quiz::CERTIFICATE_DIRECTORY);

            $category = Category::TESTS;
            if($request->start_date && $request->end_date) {
                $category = Category::OLYMPICS;
            }
            DB::beginTransaction();
            $quiz = Quiz::create([
                'name' => $request->name,
                'image_path' => $path,
                'description' => $request->description,
                'price' => $request->price,
                'duration' =>$request->duration,
                'subject_id' => $request->subject_id,
                'category_id' => $category,
                'role_id' => $request->role_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'first_place' => $request->first_place,
                'first_place_certificate' => $first_place_certificate_path,
                'second_place' => $request->second_place,
                'second_place_certificate' => $second_place_certificate_path,
                'third_place' => $request->third_place,
                'third_place_certificate' => $third_place_certificate_path,
                'default_certificate' => $default_certificate_path
            ]);
            if($request->documents) {
                foreach ($request->documents as $document) {
                    $documents[] = [
                        'quiz_id' => $quiz->id,
                        'path' => $this->fileService->store($document, Quiz::DOCUMENT_DIRECTORY),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
                QuizDocument::insert($documents);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            if($path) $this->fileService->remove($path);
            if($first_place_certificate_path) $this->fileService->remove($first_place_certificate_path);
            if($second_place_certificate_path) $this->fileService->remove($second_place_certificate_path);
            if($third_place_certificate_path) $this->fileService->remove($third_place_certificate_path);
            if($default_certificate_path) $this->fileService->remove($default_certificate_path);
            if($documents) {
                foreach ($documents as $document) {
                    $this->fileService->remove($document['path']);
                }
            }

            throw new WebServiceExplainedException($exception->getMessage());
        }
        $this->added();
        return redirect()->route('quiz.index');
    }

    public function edit(QuizEditWebRequest $request) {
        $quiz = Quiz::find($request->id);
        $quiz_web_form = QuizWebForm::inputGroups($quiz);
        return $this->adminPagesView('quiz.edit', compact( 'quiz_web_form', 'quiz'));
    }

    public function update(QuizWebRequest $request)
    {
        $now = now();
        $quiz = Quiz::find($request->id);
        $old_path = $quiz->image_path;
        $path = null;
        $deleted_paths = [];
        $documents = [];

        $first_place_certificate_path = null;
        $second_place_certificate_path = null;
        $third_place_certificate_path = null;
        $default_certificate_path = null;

        if($request->image) {
            $path = $this->fileService->updateWithRemoveOrStore($request->image, Quiz::IMAGE_DIRECTORY, $old_path);
        }
        if($request->first_place_certificate) {
            $first_place_certificate_path = $this->fileService->store($request->first_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
        }
        if($request->second_place_certificate) {
            $second_place_certificate_path = $this->fileService->store($request->second_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
        }
        if($request->third_place_certificate) {
            $third_place_certificate_path = $this->fileService->store($request->third_place_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
        }
        if($request->default_certificate) {
            $default_certificate_path = $this->fileService->store($request->default_certificate,
                Quiz::CERTIFICATE_DIRECTORY);
        }

        $first_place_certificate_path = $first_place_certificate_path ? $first_place_certificate_path
            : $quiz->first_place_certificate;
        $second_place_certificate_path = $second_place_certificate_path ? $second_place_certificate_path
            : $quiz->second_place_certificate;
        $third_place_certificate_path = $third_place_certificate_path ? $third_place_certificate_path
            : $quiz->third_place_certificate;
        $default_certificate_path = $default_certificate_path ? $default_certificate_path
            : $quiz->default_certificate;
        try {

            $category = Category::TESTS;
            if($request->start_date && $request->end_date) {
                $category = Category::OLYMPICS;
            }

            DB::beginTransaction();
            $quiz->update([
                'name' => $request->name,
                'image_path' => $path ? $path : $old_path,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $category,
                'duration' =>$request->duration,
                'subject_id' => $request->subject_id,
                'start_date' => $request->start_date,
                'role_id' => $request->role_id,
                'end_date' => $request->end_date,
                'first_place' => $request->first_place,
                'first_place_certificate' => $first_place_certificate_path,
                'second_place' => $request->second_place,
                'second_place_certificate' => $second_place_certificate_path,
                'third_place' => $request->third_place,
                'third_place_certificate' => $third_place_certificate_path,
                'default_certificate' => $default_certificate_path
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
            $this->edited();
            return redirect()->route('quiz.index');
        } catch (\Exception $exception) {

            if($path) $this->fileService->remove($path);
            if($path) $this->fileService->remove($path);
            if($first_place_certificate_path) $this->fileService->remove($first_place_certificate_path);
            if($second_place_certificate_path) $this->fileService->remove($second_place_certificate_path);
            if($third_place_certificate_path) $this->fileService->remove($third_place_certificate_path);
            if($default_certificate_path) $this->fileService->remove($default_certificate_path);
            if($documents) {
                foreach ($documents as $document) {
                    $this->fileService->remove($document['path']);
                }
            }

            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function delete(QuizWebRequest $request)
    {
        Quiz::destroy($request->id);
        $this->deleted();
        return redirect()->route('quiz.index');
    }

}

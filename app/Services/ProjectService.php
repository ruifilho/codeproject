<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 21:02
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Mockery\CountValidator\Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class ProjectService
{
    protected $repository;
    protected $validator;
    protected $filesystem;
    protected $storage;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem  $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data){
        //regras de negócio em geral;
        //enviar email;
        //disparar notificação;
        //postar um tweet;

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function show($id)
    {
        try{
            return $this->repository->find($id);
        } catch (\Exception $e){
            return [
                'error' => true,
                'message' => 'Projeto não encontrado com o código '.$id
            ];
        }
    }

    public function update(array $data, $id){

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function createFile(array $data){

        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));

    }
}
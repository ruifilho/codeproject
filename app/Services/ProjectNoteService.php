<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 21:02
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
    protected $repository;
    protected $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
}
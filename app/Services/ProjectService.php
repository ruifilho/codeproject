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
use Mockery\CountValidator\Exception;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    protected $repository;
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
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
}
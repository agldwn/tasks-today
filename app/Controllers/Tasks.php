<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Tasks extends BaseController
{
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tasks for Today',
            'tasks' => $this->taskModel
                ->where('task_date', date('Y-m-d'))
                ->where('is_archived', 0)
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('welcome', $data);
    }

    public function all()
    {
        $data = [
            'title' => 'All Tasks',
            'tasks' => $this->taskModel
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('tasks', $data);
    }

    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'user' => $this->userModel->first()
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'About'
        ]);
    }

    public function create()
    {
        return view('tasks/new', [
            'title' => 'New Task'
        ]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => trim($this->request->getPost('title')),
            'status' => 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = $this->taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks/edit', [
            'title' => 'Edit Task',
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[pending,completed]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title' => trim($this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $this->taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}
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
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('tasks', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->userModel->first()
        ];

        return view('profile', $data);
    }

    public function about()
    {
        return view('about', [
            'title' => 'About'
        ]);
    }
}
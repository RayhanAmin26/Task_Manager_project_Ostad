<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // 🟢 সমস্ত টাস্ক দেখানোর জন্য (GET /tasks)
    public function index()
    {
        $tasks = Task::all(); // টাস্ক গুলো ডাটাবেজ থেকে আনা
        return view('index', compact('tasks')); // view এ পাঠানো
    }

    // 🟢 নতুন টাস্ক যোগ করার জন্য (POST /tasks)
    public function store(Request $request)
    {
        // ইনপুট ভ্যালিডেশন
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // ডেটা ডাটাবেজে সংরক্ষণ
        Task::create([
            'title' => $request->title,
        ]);

        // Success message সহ redirect
        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // টাস্ক খুঁজে বের করা
        $task->delete(); // ডিলিট করা

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

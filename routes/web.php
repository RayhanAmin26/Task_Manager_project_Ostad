use App\Http\Controllers\TaskController;

// সব টাস্ক দেখানোর জন্য
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// নতুন টাস্ক সংরক্ষণের জন্য
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// টাস্ক ডিলিট করার জন্য
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


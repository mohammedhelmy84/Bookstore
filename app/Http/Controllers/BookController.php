<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('home_page',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf',
        ], [
            'title.required' => 'حقل العنوان مطلوب',
            'description.required' => 'حقل الوصف مطلوب',
            'file.required' => 'اختر ملف',
            'file.mimes' => 'صيغة الكتاب يجب ان تكون   pdf',
        ]);
        try {
            $file_path = $request->file('file');
            $file_name = $file_path->getClientOriginalName();
            $destfile = "assets/book";
            $book = Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'file' => $file_path->getClientOriginalName(),
            ]);
            $book->save();
            $file_path->move($destfile, $file_name);
            session()->flash('success', 'تم اضافة الكتاب بنجاح');
            return back();
        } catch (Exception $ex) {
            return redirect()->route('add_book')
            ->with('warning', 'حدث خطأ اثناء الحفظ');
        }
    }



    public function download_book($file_name)
    {

        $fullPath = Storage::disk('Books_uploads')->get($file_name);
        return response()->download($fullPath);
    }

    public function search(Request $request){
       $search = $request->search;
       $books = Book::where(function($query) use ($search){
          $query->where('title','like',"%$search%");
       })->get();

       return view('home_page',compact('books','search'));
    }
}

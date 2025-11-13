<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller {

    function index(): View {
        $blogs = Blog::all();//select * from blog;
        $array = ['blogs' => $blogs];
        return view('blog.index', $array);
        //return view('blog.index', compact('blogs'));
    }

    function create(): View {
        return view('blog.create');
    }

    function store(Request $request): RedirectResponse {
        //eloquent
        $result = false;
        try {
        $request->validate([
            'nombre' => 'required|string|max:60',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|max:100|unique:alumnos,correo',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|max:2048',
        ]);
        } catch (ValidationException $e) {
        return back()->withInput()->withErrors($e->errors());
        }
        $blog = new Blog($request->all());
        $blog->path = null;
        //esta parte del codigo me soluciona un error que me daba todo null, se la pedi a la ia
        try {
        $result = $blog->save();

        if ($result) {
            $path = $this->upload($request, $blog->id);

            if ($path !== null) {
                $blog->path = $path;
                $result = $blog->save();
            }
        }

        $message = 'El nuevo registro ha sido añadido.';

    } catch(UniqueConstraintViolationException $e) {
        $message = 'Ya existe un registro con ese correo electrónico.';
        $result = false;
    } catch(QueryException $e) {
        dd($e->getMessage());
    } catch(\Exception $e) {
        $message = 'Error inesperado. Consulte el log del servidor.';
        $result = false;
    }
    $messageArray = [
        'general' => $message
    ];
    if($result) {
        return redirect()->route('main.index')->with($messageArray);
    } else {
        return back()->withInput()->withErrors($messageArray);
    }
    }

    private function upload(Request $request, $id) {
        $image = $request->file('fotografia');
        if (!$image) {
            return null;
        }
        $fileName = $id . '_' . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('images', $fileName, 'public');
        return Storage::url($path);
        //dd([storage_path('app/public') . '/' . $path1, storage_path('app/private') . '/' . $path2]);
    }

    function show(Blog $blog): View {
        $year = Carbon::now()->year;
        return view('blog.show', ['blog' => $blog, 'year' => $year]);
    }

    //no me llega el blog
    function show2($id): View {//Blog $blog
        $blog = Blog::find($id);
        if($blog == null) {
            abort(404);
        } else {
            return view('blog.show', ['blog' => $blog]);
        }
    }
    function edit(Blog $blog) {
        return view('blog.edit', ['blog' => $blog]);
    }

    function update(Request $request, Blog $blog) {
        $result = false;
        try {
            $result = $blog->update($request->all());
            $message = 'The new has been edited.';
        } catch(UniqueConstraintViolationException $e) {
            $message = 'The same author could not write the same entry.';
        } catch(QueryException $e) {
            $message = 'Any of the entries is null.';
        } catch(\Exception $e) {
            $message = 'Se ha producido un error, en caso de que persista, consulte al administrador.';
        }
        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('blog.edit', $blog->id)->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }

    function update2(Request $request, Blog $blog) {
        dd([$request, $blog]);
        //1º
        $blog->fill($request->all());
        $result = $blog->save();//update
        //2º
        $result = $blog->update($request->all());//update
        //3º
        $author = $blog->author;
        //$blog->fill($request->all());
        $blog->author = $author;
        $result = $blog->save();//update
    }

    function destroy(Blog $blog) {

        try {
            $result = $blog->delete();
            $message = 'The Curriculum has been deleted.';
        } catch(\Exception $e) {
            $result = false;
            $message = 'The Curriculum has not been deleted.';
        }
        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('blog.index')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }
}

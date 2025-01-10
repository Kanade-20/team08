<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CancerKnowledge;
use App\Models\QueryHistory;
use Illuminate\Support\Facades\Auth;

class CancerKnowledgeController extends Controller
{   
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) 
    {
        // 获取癌症知识，分页显示
        $cancerknowledge = CancerKnowledge::paginate(10);
        // 返回视图并传递数据
        return view("CancerKnowledge.index", compact('cancerknowledge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CancerKnowledge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'category' => 'required|string',
            'keywords' => 'required|string|max:500'
        ]);

        $cancerknowledge = CancerKnowledge::create($validated);
        return redirect('CancerKnowledge')->with('success', 'Cancer-knowledge added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancerknowledge = CancerKnowledge::findOrFail($id);
        return view('CancerKnowledge.show', compact('cancerknowledge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cancerknowledge = CancerKnowledge::findOrFail($id);
        return view('CancerKnowledge.edit', compact('cancerknowledge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cancerknowledge = CancerKnowledge::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'category' => 'required|string',
            'keywords' => 'required|string|max:500'
        ], 
        [
            'title.required' => '标题是必填项。',
            'title.string' => '标题必须是字符串。',
            'title.max' => '标题不能超过255个字符。',
            
            'content.required' => '内容是必填项。',
            'content.string' => '内容必须是字符串。',
            'content.max' => '内容不能超过500个字符。',
            
            'category.required' => '类别是必填项。',
            'category.string' => '类别必须是字符串。',
            
            'keywords.required' => '关键字是必填项。',
            'keywords.string' => '关键字必须是字符串。',
            'keywords.max' => '关键字不能超过500个字符。',
        ]);
        

        $cancerknowledge->update($validated);
        
        return redirect('CancerKnowledge')->with('success', 'Cancer-knowledge updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancerknowledge = CancerKnowledge::findOrFail($id);
        $cancerknowledge->delete();
        return redirect('CancerKnowledge')->with('success', 'Knowledge deleted successfully!');
    }

    /**
     * Search cancer knowledge by search term and category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // 临时设置更高的内存限制
        ini_set('memory_limit', '512M');
        
        // 获取搜索条件
        $searchTerm = $request->get('search');  // 搜索关键字
        $category = $request->get('category');  // 搜索分类

        // 保存查询历史
        if (auth()->check()) {
            QueryHistory::create([
                'user_id' => auth()->id(),
                'search_term' => $searchTerm,
                'category' => $category,
            ]);
        }
    
        // 查询数据：根据搜索内容和分类过滤
        $query = CancerKnowledge::query();
    
        // 根据标题、内容和关键字进行模糊搜索
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhere('keywords', 'like', '%' . $searchTerm . '%'); // 搜索 keywords
            });
        }

        // 根据分类过滤
        if ($category) {
            $query->where('category', $category);
        }

        // 获取分页结果
        $cancerknowledge = $query->paginate(10);

        //返回视图
        return view('CancerKnowledge.index', compact('cancerknowledge', 'searchTerm', 'category'));
    }

}

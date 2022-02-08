<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Image;

class ImageController extends Controller
{
    public function index()
    {
        //
        $all=Image::paginate(3);
        $cols=['校園映像圖片', '顯示', '刪除', '操作'];
        $rows=[];

        foreach($all as $a){
            $tmp=[
                [
                    'tag'=>'img',
                    'src'=>$a->img,
                    'style'=>'width:100px;header:68px'
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-success',
                    'action'=>'show',
                    'id'=>$a->id,
                    'text'=>($a->sh==1)?'顯示':'隱藏',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-danger',
                    'action'=>'delete',
                    'id'=>$a->id,
                    'text'=>'刪除',
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-info',
                    'action'=>'edit',
                    'id'=>$a->id,
                    'text'=>'編輯',
                ]
            ];

            $rows[]=$tmp;
        }
        
        // dd($rows);

        // $view=[
        //     'header'=>'校園映像圖片管理', 
        //     'module'=>'Image', 
        //     'cols'=>$cols,
        //     'rows'=>$rows,
        // ];
        $this->view['header']='校園映像圖片管理';
        $this->view['module']='Image';
        $this->view['cols']=$cols;
        $this->view['rows']=$rows;
        $this->view['paginate']=$all->links();
        
        return view('backend.module', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view=[
            'action'=>'/admin/image',
            'modal_header'=>'新增校園映像圖片',
            'modal_body'=>[
                [
                    'label'=>'校園映像圖片',
                    'tag'=>'input',
                    'type'=>'file',
                    'name'=>'img'
                ],
            ],
        ];
        return view("modals.base_modal", $view);
        // return view('modals.base_modal', ['modal_header'=>'新增網站標題']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('img') && $request->file('img')->isValid()){  //hasFile如果有檔案，且isValid被驗證過
            // $filename=$request->file('img')->getClientOriginalName(); //拿到上傳的檔名
            // $request->file('img')->storeAs('img', $filename); //存入img檔案底下，檔名$filename
            // $text=$request->input('text');

            // $title=new Title;
            // $title->img=$filename;
            // $title->text=$text;
            $image=new Image;
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $image->img=$request->file('img')->getClientOriginalName();
            $image->save();
        }
        // return "儲存新資料";
        return redirect(('/admin/image'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $image=Image::find($id);
        $view=[
            'action'=>'/admin/image/'.$id,
            'method'=>'patch', //瀏覽器沒有patch的方法，所以需要自行新增
            'modal_header'=>'編輯校園映像圖片',
            'modal_body'=>[
                [
                    'label'=>'目前校園映像圖片',
                    'tag'=>'img',
                    'src'=>$image->img,
                    'style'=>'width:100px;height:68px'
                ],
                [
                    'label'=>'更換校園映像圖片',
                    'tag'=>'input',
                    'type'=>'file',
                    'name'=>'img'
                ],
            ],
        ];
        return view("modals.base_modal", $view);
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
        //
        $image=Image::find($id);
        if($request->hasFile('img') && $request->file('img')->isValid()){  //hasFile如果有檔案，且isValid被驗證過
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());
            $image->img=$request->file('img')->getClientOriginalName();
            $image->save();
        }
        
        // return "更新資料";
        return redirect('/admin/image');
    }
    /**
     * 改變資料顯示方法
     */
    public function display($id)
    {
        $image=Image::find($id);
        $image->sh=($image->sh+1)%2;
        $image->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Image::destroy($id);
    }
}

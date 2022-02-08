<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bottom;

class BottomController extends Controller
{
    public function index()
    {
        //
        $bottom=Bottom::first();
        $cols=['頁尾版權管理'];
        $rows=[
                [
                    'text'=>$bottom->bottom
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'btn_color'=>'btn-info',
                    'action'=>'edit',
                    'id'=>$bottom->id,
                    'text'=>'編輯',
                ]
        ];
        
        // dd($rows);

        // $view=[
        //     'header'=>'頁尾版權管理', 
        //     'module'=>'Bottom', 
        //     'cols'=>$cols,
        //     'rows'=>$rows,
        // ];
        $this->view['header']='頁尾版權管理';
        $this->view['module']='Bottom';
        $this->view['cols']=$cols;
        $this->view['rows']=$rows;
        
        return view('backend.module', $this->view);
    }

    public function edit($id)
    {
        //
        $bottom=Bottom::find($id);
        $view=[
            'action'=>'/admin/bottom/'.$id,
            'method'=>'patch', //瀏覽器沒有patch的方法，所以需要自行新增
            'modal_header'=>'編輯頁尾版權文字',
            'modal_body'=>[
                [
                    'label'=>'頁尾版權',
                    'tag'=>'input',
                    'type'=>'text',
                    'name'=>'bottom',
                    'value'=>$bottom->bottom
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
        $bottom=Bottom::find($id);

        if($bottom->bottom!=$request->input('bottom')){
            $bottom->bottom=$request->input('bottom');
            $bottom->save();
        }

        
        // return "更新資料";
        return redirect('/admin/bottom');
    }
}

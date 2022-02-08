<!-- Modal -->                  <!-- 彈出視窗 -->
<div class="modal fade" id="baseModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="w-100">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCenter">{{ $modal_header }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf <!-- type='hodden' name='_token'(權杖) 會產生亂碼，伺服器端也會產生亂碼，作為兩端比對用，唯一性-->
                @isset($method)
                    @method($method)   
                @endisset
                <table class="m-auto">
                    {{-- <tr>
                        <td>標題區圖片</td>
                        <td>@include('layouts.input', ['type'=>'file', 'name'=>'img'])</td>
                    </tr>
                    <tr>
                        <td>標題區替代文字</td>
                        <td><input type="text" name="text" id=""></td>
                    </tr> --}}
                    @isset($modal_body)
                    @foreach ($modal_body as $row)
                        <tr>
                            <td class='text-right'>{{$row['label']}}</td>
                            <td>
                                @switch($row['tag'])
                                    @case('input')
                                        @include("layouts.input", $row)
                                    @break
                                    @case('textarea')
                                        @include("layouts.textarea", $row)
                                    @break
                                    @case('img')
                                        @include('layouts.img', $row)
                                    @break
                                    @case('embed')
                                        @include('layouts.embed', $row)
                                    @break
                                    @default
                                    {{ $row['text'] }}
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">重置</button>
                <button type="submit" class="btn btn-primary">儲存</button>
            </div>
        </div>
    </form>
    </div>
</div>
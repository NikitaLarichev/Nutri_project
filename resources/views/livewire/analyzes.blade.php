<div class="my-5">
    <div class="my-2 text-center"><strong>Анализы</strong></div>
    @if($analyzes->count() == 0)
    <tr><td>Пользователь пока не предоставил результаты анализов</td></tr>
    @endif
    <table class="c1 w-100">
        <colgroup>
            <col style="width:10%">
            <col style="width:80%">
            <col style="width:5%">
            <col style="width:5%">
        </colgroup>
        @foreach($analyzes as $analysis)
        <tr>
            <td><div class="small">{{$analysis->created_at->format('d.m.Y')}}</div></td>
            <td><a class="small" href="{{route('analysis_reading', ['filename'=>$analysis->name])}}">{{$analysis->name}}</a></td>
            <td><a class="small" wire:click="analysisDownload({{$analysis->id}})" href="javasript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
            </a></td>
            <td><a class="small" wire:click="analysisDelete({{$analysis->id}})" href="javasript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </a></td>
        </tr>
        @endforeach
        @script
        <script>
            $wire.on('del_refresh', ()=>{
                $wire.refresh();
            })
        </script>
        @endscript
    </table>
</div

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientListModal">
  Launch demo modal
</button> -->

<!-- Modal -->
 <div>
    <table class="с1">
        <colgroup>
            <col style="width:5%">
            <col style="width:80%">
            <col style="width:5%">
            <col style="width:5%">
            <col style="width:5%">
        </colgroup>
        @foreach($materials as $index=>$material)
        <tr class="my-1">
            <td>{{$index + 1}}.</td>
            <td><a href="{{route('read_mat', [$material->name])}}">{{substr($material->name, 0, strrpos($material->name, '_'))}}</a></td>
            <td><a href="{{route('download_mat', [$material->name])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
            </a></td>
            <td><a href="{{route('delete_mat', [$material->name])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </a></td>
            <td><a id="sendMaterial" wire:click="showClientListModal({{$material->id}})" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg>
            </a></td>
        </tr>
        @endforeach
    </table>
        <div class="modal fade" id="clientListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Выбирите клиента</h5>
            </div>
                <table class="table table-hover">
                    @foreach($clients as $client)
                        <tr wire:click="sendMatToClient({{$client->id}})">
                            <td><a href="javascript:void(0)">{{$client->name}}</a></td>
                            <td>{{$client->email}}</td>
                        </tr>
                    @endforeach
                </table>
            <div class="modal-footer">
                <button wire:click="hideClientListModal" type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
            </div>
        </div>
        </div>
        @script
            <script>
                $wire.on('show-clients-modal', (obj) => {
                    $wire.material_id = obj.mat_id;
                    $('#clientListModal').modal('show');
                })
                $wire.on('hide-clients-modal', () => {                       
                    $('#clientListModal').modal('hide');
                    //$wire.refresh();
                })
            </script>
        @endscript
</div>


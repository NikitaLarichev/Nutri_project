<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientListModal">
  Launch demo modal
</button> -->

<!-- Modal -->
 <div>
    <table class="table">
        @foreach($materials as $material)
        <tr>
            <td>{{$material->id}}</td>
            <td><a class="small" href="{{route('read_mat', [$material->name])}}">{{$material->name}}</a></td>
            <td><a class="small" href="{{route('download_mat', [$material->name])}}">скачать</a></td>
            <td><a class="small" href="{{route('delete_mat', [$material->name])}}">удалить</a></td>
            <td><a class="small" id="sendMaterial" wire:click="showClientListModal({{$material->id}})" href="javascript:void(0)">отправить</a></td>
        </tr>
        @endforeach
    </table>
        <div class="modal fade" id="clientListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Выбирите клиента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    @foreach($clients as $client)
                        <tr wire:click="sendMatToClient({{$client->id}})"><td>{{$client->name}}</td></tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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


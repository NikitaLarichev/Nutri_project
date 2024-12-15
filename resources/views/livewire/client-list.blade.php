<div>  
    <h4 class="m-5">Список пользователей</h4> 
    <table class="c1 w-100">
        <colgroup>
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:25%">
            <col style="width:15%">
        </colgroup>
        @foreach($users as $index => $user)
            @if($user->status == 'blocked')
                <tr class="c1 txt-outline text-danger">
            @elseif($user->status == 'user')
                <tr class="c1 txt-outline text-warning">
            @else
                <tr class="c1 txt-outline text-success">
            @endif
                <td class="px-3"><a href="{{route('client', [$user->id])}}">{{$user->name}}</a></td>
                <td class="px-3">{{$user->email}}</td>
                <td class="px-3">
                    @if($user->status == 'blocked')
                        <div class="txt-outline text-danger">{{$user->status}}</div>
                    @elseif($user->status == 'user')
                        <div class="txt-outline text-warning">{{$user->status}}</div>
                    @else
                        <div class="txt-outline text-success">{{$user->status}}</div>
                    @endif
                </td>
                <td class="px-3">
                    <form wire:change="changeUserStatus({{$user->id}}, {{$index}})">
                    @csrf
                    <select class="form-select c1 txt-outline" wire:model="status.{{$index}}">
                        <option disabled value="">Выбирите статус</option>
                        @foreach($allStatus as $status)
                            @if($user->status == $status)
                                <option selected value="{{$status}}">{{$status}}</option>
                            @else
                                <option value="{{$status}}">{{$status}}</option>
                            @endif
                        @endforeach
                    </select>
                    </form>
                </td>
                @if($current_products_id[$index] == null)
                <form wire:submit.prevent="clientProductCreate({{$index}})">
                @csrf
                <td class="px-3">
                    <select class="form-select c1 txt-outline"  wire:model="current_products_id.{{$index}}">
                        <option value="">Выберите услугу</option>
                        @foreach($products as $index=>$product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-3">
                    <input type="hidden" value="{{$user->name}}" wire:model="user_id"/>
                    <button type="submit" class="button-outline c3" >Начать</button>
                </td>
                </form>
                @else
                <td class="px-3">
                    <div>{{$current_products[$index]->name}}</div>
                    <div class="small">{{App\Models\ClientProduct::firstWhere('id', $current_products_id[$index])->start_date}}</div>
                </td>
                <td class="px-3">
                    <button wire:click="clientProductFinish({{$index}})" class="button-outline c3" >Закончить</button>
                </td>
                @endif
            </tr>
        @endforeach
    </table>
    @script
    <script>
        $wire.on('refresh', ()=>{
            $wire.refresh();
        })
    </script>
    @endscript
</div>

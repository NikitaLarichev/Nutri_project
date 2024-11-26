<table wire:poll class="table table-striped ms-m15">
        @foreach($users as $index => $user)
            <tr>
                <td><a href="{{route('client', [$user->id])}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->status == 'blocked')
                        <div class="text-danger">{{$user->status}}</div>
                    @elseif($user->status == 'user')
                        <div class="text-warning">{{$user->status}}</div>
                    @else
                        <div class="text-success">{{$user->status}}</div>
                    @endif
                </td>
                <td>
                    <!-- <form wire:click="changeUserStatus({{$user->id}})"> -->
                        <form wire:change="changeUserStatus({{$user->id}}, {{$index}})">
                        <select class="form-select" wire:model="status.{{$index}}">
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
                    <!-- </form> -->
                </td>
                <td>
                    @foreach($products as $product)
                        @if($product->client_id == $user->id)
                            @if($product->end_date != null)
                                <div style="color:gray">{{$product->name}}</div>
                                <div class="small" style="color:gray">{{$product->start_date - $product->end_date}}</div>
                            @else
                                <div>{{$product->name}}</div>
                                <div class="small">{{$product->start_date}} - ...</div>
                            @endif
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>

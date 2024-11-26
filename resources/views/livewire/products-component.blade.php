 <div>   
    <h1>УCЛУГИ</h1>
            @foreach($products as $product)
                <div class="prodDiv"><div class="prod photo5"></div><div class="prodText"><h3 class="h3p">{{$product->name}}</h3><div class="prodText2">{{$product->short_description}}</div><div class="priceDiv"><p class="price">{{$product->price}} руб.</p> </div>
                @if(Auth::check())
                    @if(Auth::user()->role == 'admin')
                        <div><a href="{{route('delete_product', [$product->id])}}">Удалить</a></div>
                        <!-- <form wire:submit.prevent="showUpdateForm({{$product->id}})">
                            @csrf
                            <input type="submit" class="btn btn-info" value="update"/>
                        </form> -->
                    
                        <div><a id="aref" wire:click="showUpdateForm({{$product->id}})" href="javascript:void(0)">Редактировать</a></div>     
                    @endif
                @endif</div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">{{$product->name}}</h3><div class="prodText2">{{$product->short_description}}</div><div class="desc">{{$product->description}}</div><div class="priceDiv"><p class="price">{{$product->price}} руб.</p></div></div></div></div>
            @endforeach
            <div class="modal fade" id="productUpdateForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Введите новые данные</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit="productUpdate">
                    @csrf
                    <div class="modal-body">
                    
                        <div class="d-flex flex-raw ms-chat_butn_container">
            
                            <label class="form-label my-2" for="productName">Название:</label>
                            <input class="form-control my-2" type="text" id="productName" wire:model="productName"/>
                            <label class="form-label my-2" for="productShortDesc">Краткое описание:</label>
                            <input class="form-control my-2" type="text" id="productShortDesc" wire:model="productShortDescription"/>
                            <label class="form-label my-2" for="productDescription">Описание:</label>
                            <input class="form-control my-2" type="text" id="productDescription" wire:model="productDescription"/>
                            <label class="form-label my-2" for="productPrice">Цена:</label>
                            <input class="form-control my-2" type="number" id="productPrice" wire:model="productPrice"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить измененения</button>
                    </div>
                </form>
                @script
                    <script>
                        $wire.on('show-update-form', (obj) => {
                            console.log($wire.productId);
                            let num = Number(obj.id);
                            $wire.productId = num;
                            // console.log(num);
                            // let inp = document.getElementById("prodid");
                            
                            // $('#prodid').val(num);
                            $('#productUpdateForm').modal('show');
                            //inp.setAttribute("value", "trew");
                            //inp.value = "trewttt"
                        });
                        $wire.on('hide-update-form', () => {                       
                            $('#productUpdateForm').modal('hide');
                            $wire.refresh();
                        });
                    </script>
                @endscript
                </div>
            </div>
    </div>
</div>

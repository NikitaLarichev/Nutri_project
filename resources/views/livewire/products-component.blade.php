 <div>   
    <h1>УCЛУГИ</h1>
            @if (session()->has('message'))
                <div class="flash-div">
                    {{ session('message') }}
                </div>
            @endif
            @foreach($products as $product)
                <div class="prodDiv c3"><img class="img-fluid" 
                @if($product->image_path == null)
                src="{{asset('prod_images/33.jpg')}}"
                @else
                src="{{asset($product->image_path)}}" 
                @endif
                alt="image"/><div class="prodText"><h4 class="prodName">{{$product->name}}</h4><div class="prodText2">{{$product->short_description}}</div><div class="priceDiv">
                    <p class="price">
                        {{$product->price}} руб.
                    </p>
                </div>
                <div>
                    @if(!Auth::check())
                        <button class="button-outline c3" wire:click="showStatementForm({{$product->id}})">Отправить заявку</button>
                    @else
                        @if(Auth::user()->role != 'admin')
                            <button class="button-outline c3" wire:click="showStatementForm({{$product->id}}, {{Auth::user()->id}})">Отправить заявку</button>
                        @endif
                    @endif
                </div>
                @if(Auth::check())
                    @if(Auth::user()->role == 'admin')
                        <div><a href="{{route('delete_product', [$product->id])}}">Удалить</a></div>
                        <div><a id="aref" wire:click="showUpdateForm({{$product->id}})" href="javascript:void(0)">Редактировать</a></div>     
                    @endif
                @endif</div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">{{$product->name}}</h3><div class="prodText2">{{$product->short_description}}</div><div class="desc">{{$product->description}}</div><div class="priceDiv"><p class="price">{{$product->price}} руб.</p></div></div></div></div>
            @endforeach
            <div class="modal fade" id="productUpdateForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    @if(Auth::check() && Auth::user()->role == 'admin')
                        Введите новые данные
                    @else
                        Оставьте свои данные
                    @endif
                    </h5>
                    <button type="button" class="close closeModalButton" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(Auth::check() && Auth::user()->role == 'admin')
                <form wire:submit.prevent="productUpdate">
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
                            <!-- <label class="form-label my-2" for="img">Изображение:</label>
                            <input class="form-control my-2" type="file" id="img" wire:model="imgFile"/> -->
                            <!-- <div wire:loading wire:target="imgFile">Загружается...</div> -->
                        </div>         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalButton" >Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить измененения</button>
                    </div>
                </form>
                @else
                <form wire:submit.prevent="submitStatement">
                    @csrf
                    <div class="modal-body">            
                        <div class="d-flex flex-raw ms-chat_butn_container">
                            <label class="form-label my-2" for="stmName">Имя:</label>
                            <input class="form-control my-2" type="text" id="stmName" wire:model="stmName"/>
                            <label class="form-label my-2" for="stmTel">Телефон:</label>
                            <input class="form-control my-2" type="tel" id="stmTel" wire:model="stmTel"/>
                            <label class="form-label my-2" for="stmEmail">Электронная почта:</label>
                            <input class="form-control my-2" type="email" id="stmEmail" wire:model="stmEmail"/>
                        </div>
                    </div>
                    <div class="small container">Оставьте свои данные и в ближайшее время Вам перезвонят.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModalButton">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
                @endif
                </div>
            </div>
            @script
                    <script>
                        //let m = document.getElementById('productUpdateForm');
                        //let cb = document.getElementById('cb');
                        

                        $('.closeModalButton').click(()=>{
                            $('#productUpdateForm').modal('hide');
                            $wire.refresh()});

                        $wire.on('show-update-form', (obj) => {
                            let num = Number(obj.id);
                            $wire.productId = num;
                            $('#productUpdateForm').modal('show');
                        });
                        $wire.on('hide-update-form', () => {                       
                            $('#productUpdateForm').modal('hide');
                            $wire.refresh();
                        });
                        $wire.on('hide-update-form-timeout', () => {
                            setTimeout(() => {
                                $('#productUpdateForm').modal('hide');
                                $wire.refresh();
                            }, 3000);                        
                        });
                        $wire.on('show-statement-form', (obj) => {
                            $wire.stmProduct = obj[0].product;
                            if(obj[0].user != null) {
                                $wire.stmUser = obj[0].user;
                                $wire.submitStatement();
                                
                            } else {
                                $('#productUpdateForm').modal('show');
                            }
                        });
                    </script>
            @endscript
    </div>
</div>

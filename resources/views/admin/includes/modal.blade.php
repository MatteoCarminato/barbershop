<div class="modal fade text-start modal-success" id="referral" tabindex="-1" aria-labelledby="myModalLabel110"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel110">Compartilhar link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Quem é {{env('APP_NAME')}} transforma benefícios em conquistas todos os dias. E agora, também pode
                ganhar premios indicando o {{env('APP_NAME')}} para amigos.

                <div class="input-group mt-1">
                    <button class="btn btn-outline-success" type="button">
                        <i data-feather="send"></i>
                    </button>
{{--                    <input type="text" class="form-control" id="copy-to-clipboard-input"--}}
{{--                           value="{{URL::to('/?ref=' . auth()->user()->affiliate_id)}}" readonly/>--}}

                    <button class="btn btn-outline-success" id="btn-copy">Copiar!</button>
                </div>
            </div>
        </div>
    </div>
</div>

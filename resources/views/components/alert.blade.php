<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    @if($message)
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-{{ $type }}">
                    <button type="button" class="close" data-dismiss='alert' aria-label="close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>{{ $message }}</span>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="alert alert-{{ $type }}">
        {{ $message }}
    </div> --}}
</div>
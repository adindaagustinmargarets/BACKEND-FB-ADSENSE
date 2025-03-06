<div class="modal fade" tabindex="-1" role="dialog" id="HapusModal{{ $data->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Berita ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('berita.hapus', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    @foreach ($errors->all() as $error )
                                    {{ $error }}
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <p>Apakah Yakin Ini Menghapus Ini?</p>
                        </div>
                    </div>
                    <div class="modal-footer br">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
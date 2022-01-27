<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="card-title text-center font-weight-bold">Buat Pesan Secara Rahasia</h2>
                    <div class="container-fluid mt-3">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">
                                <form role="form" action="{{route('message.register')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kamu">
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <button class="btn btn-primary btn-block">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
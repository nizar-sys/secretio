<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="card-title font-weight-bold text-center">Beranda {{ $user->name }}</h3>

                    <div class="text-center">
                        <div class="align-items-center">
                            <a href="google.com"><i class="fa fa-facebook border p-3 rounded mr-1"></i></a>
                            <a href=""><i class="fa fa-twitter border p-3 rounded mr-1"></i></a>
                            <a href=""><i class="fa fa-linkedin border p-3 rounded mr-1"></i></a>
                            <a href=""><i class="fa fa-instagram border p-3 rounded mr-1"></i></a>
                            <a href=""><i class="fa fa-dribbble border p-3 rounded mr-1"></i></a>
                            <a href=""><i class="fa fa-pinterest-p border p-3 rounded mr-1"></i></a>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section" id="myGroup">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2"><span
                                                    class="d-block font-weight-bold name">Seseorang</span><span
                                                    class="date text-black-50">Shared publicly - Jan 2020</span></div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row fs-12">
                                            <div class="like p-2 cursor action-collapse" data-toggle="collapse"
                                                aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"><i
                                                    class="fa fa-commenting-o"></i><span
                                                    class="ml-1">Balas</span></div>

                                            <div class="like p-2 cursor action-collapse" data-toggle="collapse"
                                                aria-expanded="true" aria-controls="collapse-2" href="#collapse-2"><i
                                                    class="fa fa-reply-all"></i><span
                                                    class="ml-1">Lihat Balasan</span></div>
                                        </div>
                                    </div>
                                    <div id="collapse-1" class="bg-light p-2 collapse" data-parent="#myGroup">
                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                width="40"><textarea class="form-control ml-1 textarea"></textarea>
                                        </div>
                                        <div class="mt-2 text-right">
                                            <button class="btn btn-outline-primary btn-sm" type="button">Kirim
                                                Balasan</button>
                                            <button class="btn btn-outline-primary btn-sm ml-1" data-toggle="collapse"
                                                aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"
                                                type="button">Batal</button>
                                        </div>
                                    </div>
                                    <div id="collapse-2" class="p-2 collapse" data-parent="#myGroupBalasan">
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-md-8">
                                                <div class="d-flex flex-column comment-section" id="myGroupBalasan">
                                                    <div class="bg-white p-2">
                                                        <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                                width="40">
                                                            <div class="d-flex flex-column justify-content-start ml-2"><span
                                                                    class="d-block font-weight-bold name">Seseorang</span><span
                                                                    class="date text-black-50">Shared publicly - Jan 2020</span></div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                                ut aliquip ex ea commodo consequat.</p>
                                                        </div>
                                                    </div>
                                                    <div class="bg-white p-2">
                                                        <div class="d-flex flex-row fs-12">
                                                            <div class="like p-2 cursor action-collapse" data-toggle="collapse"
                                                                aria-expanded="true" aria-controls="collapse-balasan-1" href="#collapse-balasan-1"><i
                                                                    class="fa fa-commenting-o"></i><span
                                                                    class="ml-1">Balas</span></div>
                                                        </div>
                                                    </div>
                                                    <div id="collapse-balasan-1" class="bg-light p-2 collapse" data-parent="#myGroupBalasan">
                                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                                width="40"><textarea class="form-control ml-1 textarea"></textarea>
                                                        </div>
                                                        <div class="mt-2 text-right">
                                                            <button class="btn btn-outline-primary btn-sm" type="button">Kirim
                                                                Balasan</button>
                                                            <button class="btn btn-outline-primary btn-sm ml-1" data-toggle="collapse"
                                                                aria-expanded="true" aria-controls="collapse-balasan-1" href="#collapse-balasan-1"
                                                                type="button">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- post message --}}
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="card-title font-weight-bold text-center">Sampaikan sesuatu <span id="mess"></span></h3>

                    <div class="container-fluid mt-4">
                        <form action="{{route('message.post', ['msg-slug' => $slug])}}" method="POST">
                            @csrf
                            {{-- post message --}}
                            <div class="d-flex justify-content-center row mt-5">
                                <div class="col-md-8">
                                    <div class="bg-light p-2">
                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                width="40"><textarea class="form-control ml-1 textarea"></textarea>
                                        </div>
                                        <div class="mt-2 text-right">
                                            <button class="btn btn-outline-primary btn-sm" type="submit">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
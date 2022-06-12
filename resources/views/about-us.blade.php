@extends('layouts.main')

@section('content')
    <!-- Main -->
    <main>
        <!-- Heading -->
        <div class="py-5 px-4">
            <h2 class="text-center">
                <span style="color: #3F72AF;">KNOCK OUT</span>
            </h2>
            <p class="mt-4 fs-5" style="padding: 0 60px;">
                Hi, we are Knock Out. Knockout was born because of a 
                lecture at our university. After a few months, we 
                developed several mobile applications due to college 
                assignments. Also, we participated in several competitions 
                to improve our skills in technology field.  
            </p>
        </div>

        <div class="container-fluid py-3 background-primary mt-lg-5" id="explore">
            <div class="row px-2 px-lg-5 py-lg-5">
                <div class="container">
                    <div class="row">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <p class="text-light text-center fs-3 fw-bold">
                                    Recent Projects
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-lg-4">
                        <div class="col-md-4 p-4">
                            <div class="card-promos shadow p-3">
                                <img src="{{ asset('images/img_trash_in.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 h-80" alt="Promo">
                                <div class="container px-4 pt-4 py-2 text-center">
                                    <h3>
                                        Trash In
                                    </h3>
                                    <p>
                                        Application to change the reusable trash to the 
                                        vending machine and you can have an e-money 
                                        balance in TrashIn mobile app.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="card-promos shadow p-3">
                                <img src="{{ asset('images/img_mend.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 h-80" alt="Promo">
                                <div class="container px-4 pt-4 py-2 text-center">
                                    <h3>
                                        MEND
                                    </h3>
                                    <p>
                                        This app allows you to find out if there are any 
                                        mental health issues happening to your children 
                                        by analyzing the symptoms.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="card-promos shadow p-3">
                                <img src="{{ asset('images/ic_lp3i.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 h-80" alt="Promo">
                                <div class="container px-4 pt-4 py-2 text-center">
                                    <h3>
                                        Pusat Karir LP3I
                                    </h3>
                                    <p>
                                        Made this website with the approval of C&P Division 
                                        of LP3I for helping LP3I student find jobs that match 
                                        their passion. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5 px-5">
            <h2 class="text-center">
                <span style="color: #3F72AF;">Meet the Team</span>
            </h2>
            <p class="mt-4 text-center fs-5" style="padding: 0 60px;">
                In Knockout, we separate every job and make every progress to be a funny things. We also like to eat geprek and ramen.
            </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-people" style="padding: 60px">
                        <img src="{{ asset('images/img_naufal.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 p-3" alt="Promo">
                        <div class="container px-4 pt-4 py-2 text-center">
                            <h3 class="fs-4">
                                Naufal Fawwaz
                                Andriawan
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-people" style="padding: 60px">
                        <img src="{{ asset('images/img_nassya.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 p-3" alt="Promo">
                        <div class="container px-4 pt-4 py-2 text-center">
                            <h3 class="fs-4">
                                Nassya Putri
                                Riyani
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-people" style="padding: 60px">
                        <img src="{{ asset('images/img_ijah.png') }}" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" class="w-100 p-3" alt="Promo">
                        <div class="container px-4 pt-4 py-2 text-center">
                            <h3 class="fs-4">
                                Azzahra Ayu
                                Vahendra
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
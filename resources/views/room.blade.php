@extends('layouts.app')
@section('title', $room->room_name)
@section('content')
<div id="app" data-base="{{ url('/rooms/' . $room->room_id) }}" data-lobby="{{ route('lobby') }}">

    {{-- Waiting room --}}
    <section id="waiting">
        <div>
            <div class="panel" style="margin-bottom:16px">
                <h3>Room information</h3>
                <div id="winfo"></div>
            </div>
            <div class="chat">
                <div class="list" id="wchat"></div>
                <input id="winput" placeholder="Type and press Enter..." maxlength="255" autocomplete="off">
            </div>
        </div>
        <div class="panel">
            <h3 id="wcount">Players</h3>
            <div class="slots" id="slots"></div>
            <div class="row" style="margin-top:14px">
                <button class="btn danger" id="wleave">Leave</button>
                <button class="btn go" id="wmain">Ready</button>
            </div>
            <p id="whint" style="font-size:13px;margin:10px 0 0"></p>
        </div>
    </section>

    {{-- Game --}}
    <section id="game">
        <div class="g-top">
            <div class="order" id="order"></div>
        <div><span class="chip" id="round"></span> <span class="chip" id="timer"></span> <button class="btn sm danger" id="gend" style="display:none">End match</button> <button class="btn sm danger" id="gleave">Surrender</button></div>
        </div>
        <div class="g-main">
            <div>
                <div class="panel" id="stats"></div>
                <div class="chat" style="margin-top:12px">
                    <div class="list" id="gchat"></div>
                    <input id="ginput" placeholder="Chat..." maxlength="255" autocomplete="off">
                </div>
            </div>
            <div>
                <div class="board" id="board"></div>
                <div class="banner" id="banner"></div>
                <div class="actions">
                    <button class="btn" id="a-roll">Roll D10</button>
                    <button class="btn" id="a-move">Move</button>
                    <button class="btn" id="a-attack">Attack</button>
                    <button class="btn danger" id="a-end">End turn</button>
                </div>
                <div class="log" id="log"></div>
            </div>
            <div>
                <div class="panel"><h3>Inventory</h3><div id="inv"></div></div>
                <div class="dice" id="dice">D10</div>
            </div>
        </div>
    </section>
</div>

<div class="overlay" id="overlay"><div id="ovc"></div></div>
<div class="toast" id="toast"></div>
@endsection

@push('scripts')
<script src="{{ asset('js/room.js') }}"></script>
@endpush

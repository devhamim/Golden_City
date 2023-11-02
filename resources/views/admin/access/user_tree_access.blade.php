@extends('admin.master')
@section('style')
    <style>
        /*Now the CSS*/
        * {
            margin: 0;
            padding: 0;
        }

        .tree ul {
            padding-top: 20px;
            position: relative;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*We will use ::before and ::after to draw the connectors*/

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 20px;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        /*We need to remove left-right connectors from elements without
                                                                                                                                                                                                                    any siblings*/
        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        /*Remove space from the top of single children*/
        .tree li:only-child {
            padding-top: 0;
        }

        /*Remove left connector from first child and
                                                                                                                                                                                                                    right connector from last child*/
        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }

        /*Adding back the vertical connector to the last nodes*/
        .tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 20px;
        }

        .tree li a {
            border: 1px solid #ccc;
            padding: 5px 10px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;

            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*Time for some hover effects*/
        /*We will apply the hover effect the the lineage of the element also*/
        .tree li a:hover,
        .tree li a:hover+ul li a {
            background: #c8e4f8;
            color: #000;
            border: 1px solid #94a0b4;
        }

        /*Connector styles on hover*/
        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before {
            border-color: #94a0b4;
        }
    </style>
@endsection
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-10 d-flex justify-content-center">
                <div class="tree">
                    <ul>
                        <li>
                            <a href="#">
                                @if ($user->profile == null)
                                    {{ $user->username }}
                                @else
                                    <img src="{{ asset('files/profile/' . $user->profile) }}"
                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                        alt="{{ $user->username }}">
                                    <br>
                                    <span>{{ $user->username }}</span>
                                @endif
                            </a>
                            @if ($user->leftChild || $user->rightChild)
                                <ul>
                                    @if ($user->leftChild)
                                        <li>
                                            <a href="#">
                                                @if ($user->leftChild->profile == null)
                                                    {{ $user->leftChild->username }}
                                                @else
                                                    <img src="{{ asset('files/profile/' . $user->leftChild->profile) }}"
                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                        alt="{{ $user->leftChild->profile }}">
                                                    <br>
                                                    <span>{{ $user->leftChild->username }}</span>
                                                @endif
                                            </a>
                                            @if ($user->leftChild->leftChild || $user->leftChild->rightChild)
                                                <ul>
                                                    @if ($user->leftChild->leftChild)
                                                        <li>
                                                            <a href="#">
                                                                @if ($user->leftChild->leftChild->profile == null)
                                                                    {{ $user->leftChild->leftChild->username }}
                                                                @else
                                                                    <img src="{{ asset('files/profile/' . $user->leftChild->leftChild->profile) }}"
                                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                                        alt="{{ $user->leftChild->leftChild->username }}">
                                                                    <br>
                                                                    <span>{{ $user->leftChild->leftChild->username }}</span>
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($user->leftChild->rightChild)
                                                        <li>
                                                            <a href="#">
                                                                @if ($user->leftChild->leftChild->profile == null)
                                                                    {{ $user->leftChild->rightChild->username }}
                                                                @else
                                                                    <img src="{{ asset('files/profile/' . $user->leftChild->rightChild->profile) }}"
                                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                                        alt="{{ $user->leftChild->rightChild->username }}">
                                                                    <br>
                                                                    <span>{{ $user->leftChild->rightChild->username }}</span>
                                                                @endif
                                                                {{ $user->leftChild->rightChild->username }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                    @if ($user->rightChild)
                                        <li>
                                            {{-- <a href="#">{{ $user->rightChild->username }}</a> --}}
                                            <a href="#">
                                                @if ($user->rightChild->profile == null)
                                                    {{ $user->rightChild->username }}
                                                @else
                                                    <img src="{{ asset('files/profile/' . $user->rightChild->profile) }}"
                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                        alt="{{ $user->rightChild->username }}">
                                                    <br>
                                                    <span>{{ $user->rightChild->username }}</span>
                                                @endif
                                            </a>
                                            @if ($user->rightChild->leftChild || $user->rightChild->rightChild)
                                                <ul>
                                                    @if ($user->rightChild->leftChild)
                                                        <li>
                                                            <a href="#">
                                                                @if ($user->rightChild->leftChild->profile == null)
                                                                    {{ $user->rightChild->leftChild->username }}
                                                                @else
                                                                    <img src="{{ asset('files/profile/' . $user->rightChild->leftChild->profile) }}"
                                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                                        alt="{{ $user->rightChild->leftChild->username }}">
                                                                    <br>
                                                                    <span>{{ $user->rightChild->leftChild->username }}</span>
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($user->rightChild->rightChild)
                                                        <li>
                                                            <a href="#">
                                                                @if ($user->rightChild->rightChild->profile == null)
                                                                    {{ $user->rightChild->rightChild->username }}
                                                                @else
                                                                    <img src="{{ asset('files/profile/' . $user->rightChild->rightChild->profile) }}"
                                                                        style="width: 3rem;border: 1px solid #00a0b6;border-radius: 50%;"
                                                                        alt="{{ $user->rightChild->rightChild->username }}">
                                                                    <br>
                                                                    <span>{{ $user->rightChild->rightChild->username }}</span>
                                                                @endif
                                                                {{ $user->rightChild->rightChild->username }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

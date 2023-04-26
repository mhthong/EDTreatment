@extends('admin.app')

@section('sidebar')
    @include('layouts.sidebar-admin')
@endsection

@section('main')
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        @include('layouts.navbar-admin')
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Posts</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>



            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Block</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                        <div class="head-title">
                            <a href="{{ route('block.create') }}" class="btn-download">
                                <span class="text">Add new</span>
                            </a>
                        </div>

                    </div>
                    <table>

                        <thead>
                            <tr>
                                <th class="checkbox-style" style="width: 50px">
                                    <input type="checkbox" name="check[]" id="">
                                </th>
                                <th>Name</th>
                                <th>Date Update</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($Block)
                                @foreach ($Block as $row)
                                    <tr>
                                        <td class="checkbox-style">

                                            <p class="p">  <input type="checkbox" name="check[]" id=""> </p>
                                        </td>

                                        <td>
                                            <p class="p">{{ $row->name }}</p>
                                        </td>
                                        <td >  <p class="p">{{ $row->updated_at }}</p></td>
                                        <td >  <p class="p">{{ $row->description }}</p></td>

                                        <td>

                                            @isset($row->status)
                                                @if ($row->status == 'published')
                                                    <span class="status completed"> {{ $row->status }}</span>
                                                @endif

                                                @if ($row->status == 'pending')
                                                    <span class="status pending">Đang chờ xử lý</span>
                                                @endif

                                                @if ($row->status == 'draft')
                                                    <span class="status process">Bảng nháp</span>
                                                @endif
                                            @endisset
                                            <td class="action">
                                                <button class="edit completed">
                                                <a href="{{ route('blocks.edit', ['id' => $row->id]) }}">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>
                                            </button>

                                            <form method="POST" action="{{ route('blocks.delete', ['id' => $row->id]) }}"
                                                onsubmit="return ConfirmDelete( this )" class="p-0" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="edit delete" type="submit"><i class="bx bx-trash
                                                    "></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </main>
            <!-- MAIN -->
        </section>
        <!-- CONTENT -->
    @endsection

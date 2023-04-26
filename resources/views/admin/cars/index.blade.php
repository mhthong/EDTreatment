

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
                            <a href="{{ route('cars.create') }}" class="btn-download">
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
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Year</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($cars)
                            @foreach ($cars as $row)
                                <tr>

                                    <td
                                    class="checkbox-style" style="width: 50px">
                                    <input type="checkbox" name="check[]"  value="{{$row->id}}"  id="">
                                    </td>
                                    <td>
                                         {{$row ->name }}
                                    </td>
                                    <td>
                                        {{$row ->brand  }}
                                    </td>
                                    <td>
                                        <span id="amount.{{$row->id}}">{{ $row ->price }}</span>

                                    </td>
                                    <td>
                                        {{ $row ->year}}
                                    </td>
                                   <td class="action">
                                        <button class="edit completed">
                                        <a href="{{ route('cars.edit', ['car' => $row->id]) }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        </button>

                                    <form method="POST" action="{{ route('cars.destroy', ['car' => $row->id]) }}"
                                        onsubmit="return ConfirmDelete( this )" class="p-0" style="    display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="edit delete" type="submit"><i class="bx bx-trash
                                            "></i>
                                        </button>
                                    </form>

                                </td>
                                </tr>
                                @endforeach

                                @endisset

                            </tbody>
                        </table>
                    </div>

                </div>
            </main>
            <!-- MAIN -->
        </section>
        <!-- CONTENT -->
    @endsection

    @section('script')
    <script>
const amountElements = document.querySelectorAll('span[id^="amount"]'); // Lấy tất cả các phần tử span có ID bắt đầu bằng "amount"
for (let i = 0; i < amountElements.length; i++) {
  const amount = parseFloat(amountElements[i].textContent); // Lấy giá trị và chuyển đổi thành số

  let formattedAmount;
        if (amount > 1000000) {
            formattedAmount = (amount / 1000000).toLocaleString('VN') + ' Triệu'; // Định dạng số theo định dạng tiền Việt Nam và thêm đơn vị triệu
        } else {
            formattedAmount = amount.toLocaleString('VN') + ' VND'; // Định dạng số theo định dạng tiền Việt Nam
        }
        amountElements[i].textContent = formattedAmount; // Thay đổi giá trị của phần tử thành giá trị định dạng tiền Việt Nam ngắn gọn (nếu có)
}
    </script>
    @endsection

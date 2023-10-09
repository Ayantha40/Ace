@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="profile-section">
        <h3><b>👤 My Profile</b></h3>
        <h4><b>You are Accessing {{$branch->location}} Branch</b>
        </h4>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Contact No:</strong> {{ $user->mobile }}</p>
            <p><strong>DOB:</strong> {{ $user->date_of_birth }}</p>
        </div>

        <form action="{{ route('user.edit', ['id' => Auth::user()->id]) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Edit Profile</button>
        </form>

        <br>

        <form action="{{ route('user.destroy', Auth::user()->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete your profile? This action cannot be undone.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Profile</button>
        </form>
    </div>

    <div class="order-history">
        <h3><b>📃Order History</b></h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="order-history">
                @foreach($orders as $order)
                <tr>
                    <td>{{ date('Y-m-d', strtotime($order->order_date)) }}</td>
                    <td>$ {{ $order->total_amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="analytics">
    <h3><b>📊Order Analytics</b></h3>
    <p><b>Total Orders: {{$orderCount}}</b></p>
    <div class="chart-container">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div>

<style>
    .container {
        margin-top: 20px;
    }

    .profile-section {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .profile-info p {
        margin-bottom: 5px;
    }

    .order-history {
        margin-top: 30px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .order-history h3 {
        margin-bottom: 10px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .btn {
        margin-top: 10px;
    }

    .analytics {
        margin: 20px 100px 100px 100px;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .chart-container {
        max-width: 400px; /* Adjust the maximum width as needed */
        margin: 20px auto; /* Center the chart container horizontally */
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx2 = document.getElementById('myChart');

    new Chart(ctx2, {
        type: "pie",
        data: {
            labels: [
                'Pending',
                'Cancelled',
                'Paid'
            ],
            datasets: [{
                label: 'Number of Orders',
                data: [
                    {{ $unpaidOrders }},
                    {{ $cancelledOrders }},
                    {{$paidOrders}}
                ],
                backgroundColor: [
                    'rgb(123, 200, 164)',
                    'rgb(241, 180, 87)',
                    'rgb(162, 117, 196)'
                ],
                hoverOffset: 2
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Order Status' // Your title text here
                }
            }
        }
    });
</script>
@endsection

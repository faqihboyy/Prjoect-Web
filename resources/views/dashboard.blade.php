@extends('layouts/app')
@section('content')
@include('components.modal')

<style>
body {
    background-color: #4c566a !important;
}
.card {
    background-color: #3b4252 !important;
    color: white;
    border: none;
}
.card-header {
    background-color: #2e3440 !important;
    font-weight: bold;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-black">📊 Statistik Peminjaman Buku</h3>
    </div>
</div>

<!-- Grafik Buku Terpopuler -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                📖 Grafik Buku Terpopuler
            </div>
            <div class="card-body">
                <canvas id="bukuChart" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Daftar Buku Teratas -->
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                📋 Daftar Buku Teratas
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Total Dipinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Harry Potter</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laskar Pelangi</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Atomic Habits</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Rich Dad Poor Dad</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>The Subtle Art of Not Giving a F*</td>
                            <td>15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('bukuChart').getContext('2d');
        var bukuChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Harry Potter', 'Laskar Pelangi', 'Atomic Habits', 'Rich Dad Poor Dad', 'The Subtle Art'],
                datasets: [{
                    label: 'Total Dipinjam',
                    data: [30, 25, 20, 18, 15],
                    backgroundColor: ['#81a1c1', '#88c0d0', '#8fbcbb', '#a3be8c', '#b48ead'],
                    borderColor: '#2e3440',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'white'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection


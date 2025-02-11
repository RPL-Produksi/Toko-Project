@extends('layouts.app-admin')
@section('title', 'Pemasukan')

@push('css')
    <style>
        #pemasukanChart {
            max-height: 600px;
        }
    </style>
@endpush

@section('content')
    @if (session('welcome'))
        <div class="alert alert-success border-left-success">
            {{ session('welcome') }}, {{ $user->username }}
        </div>
    @endif

    <div class="card p-3">
        <h3 class="text-primary">Pemasukan perusahaan</h3>
        <hr>
        <div class="d-flex justify-content-between mb-3">
            <input type="date" id="filter-date" class="form-control w-25">
            <select id="filter-method" class="form-control w-25">
                <option value="all">Semua</option>
                <option value="cash">Cash</option>
                <option value="qris">QRIS</option>
            </select>
        </div>
        <canvas id="pemasukanChart"></canvas>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let ctx = document.getElementById('pemasukanChart').getContext('2d');
            let pemasukanChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Pemasukan',
                        data: [],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function fetchData(date, method) {
                fetch(`/api/laporan/pemasukan?date=${date}&method=${method}`)
                    .then(response => response.json())
                    .then(data => {
                        pemasukanChart.data.labels = data.labels;
                        pemasukanChart.data.datasets[0].data = data.values;
                        pemasukanChart.update();
                    });
            }

            document.getElementById('filter-date').addEventListener('change', function() {
                fetchData(this.value, document.getElementById('filter-method').value);
            });

            document.getElementById('filter-method').addEventListener('change', function() {
                fetchData(document.getElementById('filter-date').value, this.value);
            });

            fetchData('', 'all');
        });
    </script>
@endpush

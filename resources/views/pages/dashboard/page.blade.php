@extends('layouts.app-layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4 mb-10">
        <div class="p-4 bg-white shadow-sm rounded-lg border border-border">
            <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">
                    Total Revenue
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold">$45,231.89</div>
                <p class="text-xs text-muted-foreground">
                    +20.1% from last month
                </p>
            </div>
        </div>
        <div class="p-4 bg-white shadow-sm rounded-lg border border-border">
            <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">
                    Subscriptions
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold">+2350</div>
                <p class="text-xs text-muted-foreground">
                    +180.1% from last month
                </p>
            </div>
        </div>
        <div class="p-4 bg-white shadow-sm rounded-lg border border-border">
            <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">Sales</h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <path d="M2 10h20" />
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold">+12,234</div>
                <p class="text-xs text-muted-foreground">
                    +19% from last month
                </p>
            </div>
        </div>
        <div class="p-4 bg-white shadow-sm rounded-lg border border-border">
            <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                <div class="text-sm font-medium">
                    Active Now
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" class="h-4 w-4 text-muted-foreground">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                </svg>
            </div>
            <div>
                <div class="text-2xl font-bold">+573</div>
                <p class="text-xs text-muted-foreground">
                    +201 since last hour
                </p>
            </div>
        </div>
    </div>
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-7">
        <div class="col-span-4">
            <div>
                <h3 class="font-semibold">Overview</h3>
            </div>
            <div class="pl-2">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-span-3">
            <div>
                <h3 class=" font-semibold">Recent Sales</h3>
                <small>
                    You made 265 sales this month.
                    </sma>
            </div>
            <div>
                <RecentSales />
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 22, 10, 11, 29, 14, 16],
                    borderWidth: 1,
                    backgroundColor: '#ff2d20'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

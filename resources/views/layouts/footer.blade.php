<footer class="py-4 text-center border-top border-secondary border-opacity-10 mt-5">
    <div class="container">
        <p class="mb-0 small opacity-75">&copy; 2025 {{ $user->name }}. Built Apps
            with {{ optional($user->profile)->job_name ?: "Job Title" }} in Egypt.</p>
    </div>
</footer>

<div class="flex justify-end flex-row">
    <div class="border-solid border-2 border-black">
        <a href="/users">User Management</a>
    </div>
    <div class="border-solid border-2 border-black">
        <a href="/tasks">Task Management</a>
    </div>
    <div class="border-solid border-2 border-black">
        <a href="/projects">Project Management</a>
    </div>
    <div>
        <form action={{route("users.logout")}} method="POST">
            @csrf
        <button type="submit">
            Logout
        </button>
        </form>
    </div>
</div>
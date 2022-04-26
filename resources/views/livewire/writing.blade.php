<div class="d-flex writing border">
    <div class="left-side p-2">
        <div class="img">
            <img src="{{ url(asset({{ attachment }})) }}" alt="writing" />
        </div>
    </div>

    <div class="right-side w-100">
        <div class='amount text-end'><span style="border-bottom: 1px solid #dee2e6">{{ amount }}</span></div>
        <div class="d-flex justify-content-between">
            <div class="motif">{{ motif }}</div>
            <div class="text-end">{{ compte }}</div>
        </div>
    </div>
</div>

    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
 
    <div class="f1-steps">
        <div class="f1-progress">
            <div class="f1-progress-line" data-now-value="30" data-number-of-steps="3" style="width: 30%;"></div>
        </div>
        <div class="f1-step">
            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
            <a href="{{ route('list') }}">
                <p>Product</p>
            </a>
        </div>
        <div class="f1-step {{ Request::is('chart') ? 'active' : '' }}">
            <div class="f1-step-icon"><i class="fa fa-home"></i></div>
            <a href="{{ route('step2') }}">
                <p>Cart</p>
            </a>
        </div>
        <div class="f1-step">
            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
            <a href="{{ route('confirm') }}">
                <p>Confirm</p>
            </a>
        </div>
    </div><br>
    <script>
        var currentUrl = window.location.href;
        var steps = document.querySelectorAll('.f1-step');

        steps.forEach(function(step) {
            var stepUrl = step.querySelector('a').getAttribute('href');
            if (currentUrl.includes(stepUrl)) {
                step.classList.add('active');
            }
        });
    </script>

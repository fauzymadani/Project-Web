<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content nord-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accept All Terms and Conditions</h5>
            </div>
            <div class="modal-body">
                <p>By using this software, you are agree with our license term and agreement</p>
            </div>
            <div class="modal-footer">
            <button class="btn btn-primary" id="ok-button">sure</button>
            <button class="btn btn-secondary" id="cancel-button" data-dismiss="modal">nope</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const verificationModal = document.getElementById("termsModal");
    const okButton = document.getElementById("ok-button");
    const cancelButton = document.getElementById("cancel-button");

    if (!sessionStorage.getItem("verified")) {
        $('#termsModal').modal('show'); // Tampilkan modal
    }

    okButton.addEventListener("click", () => {
        sessionStorage.setItem("verified", "true");
        $('#termsModal').modal('hide'); // Sembunyikan modal
    });

    cancelButton.addEventListener("click", () => {
        window.location.href = "{{route('commits.index')}}#license"; // Redirect ke halaman list
    });
});
</script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


</div>
</div>
</main>

<!-- Footer -->
<footer class="bg-body-tertiary text-light text-center py-2 mt-2">
    <!-- Footer Content Goes Here -->
    <div class="col-6 mx-auto text-center pt-3">
        <p class="text-dark">&copy; 2024 SST. All rights reserved.</p>
    </div>
</footer>
</div>
</div>
<div id="liveNotification">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"
></script>
<script>
    function search() {
        console.log('Hello');
        var input, filter, cards, card, title, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        cards = document.getElementsByClassName("card");

        for (i = 0; i < cards.length; i++) {
            card = cards[i];
            title = card.getElementsByClassName("card-title")[0];
            if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        }
    }

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
</script>
</body>
</html>



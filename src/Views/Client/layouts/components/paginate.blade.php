<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($totalPage > 1)
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($page > 1)
                    <li class="page-item">
                        <a class="page-link linkm" href="{{ url() }}?page={{ $page - 1 }}">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @endif

                    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>

                        <li class="page-item"><a class="page-link linkm" href="{{ url() }}?page={{ $i }}">
                                <?= $i ?>
                            </a>
                        </li>

                    <?php endfor ?>

                    <?php if ($page < $totalPage) : ?>

                        <li class="page-item">
                            <a class="page-link linkm" href="{{ url() }}?page={{ $page + 1 }}">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>

                    <?php endif ?>
                </ul>
            </nav>
        </div>
        @endif
    </ul>
</nav>
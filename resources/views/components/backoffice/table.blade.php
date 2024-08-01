<section class="relative overflow-x-auto shadow-md rounded-xl">
    <table {{ $attributes->merge(['class' => 'backoffice-table w-full']) }}>
        <thead class="bg-gray-100">
            {{ $thead }}
        </thead>
        <tbody num="0">
            {{ $tbody }}
        </tbody>
        <tfoot>
            {{ $tfoot }}
        </tfoot>
    </table>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.backoffice-table th').forEach(function(element) {
            element.classList.add('p-4', 'text-start');
        });
        document.querySelectorAll('.backoffice-table tbody tr').forEach(function(element) {
            element.classList.add('border-b', 'hover:bg-gray-50');
        });
        document.querySelectorAll('.backoffice-table td').forEach(function(element) {
            element.classList.add('px-4', 'py-2');
        });
    });
</script>

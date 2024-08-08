<section class="bg-slate-900 border border-slate-800 relative overflow-x-auto shadow-md rounded-xl">
    <table {{ $attributes->merge(['class' => 'backoffice-table w-full']) }}>
        <thead class="bg-slate-800">
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
            element.classList.add('px-4', 'py-2', 'text-start');
        });
        document.querySelectorAll('.backoffice-table tbody tr').forEach(function(element) {
            element.classList.add('border-b', 'border-slate-700', 'hover:bg-slate-700');
        });
        document.querySelectorAll('.backoffice-table td').forEach(function(element) {
            element.classList.add('px-4');
        });
    });
</script>

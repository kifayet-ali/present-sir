<?php
$role = 'teacher';
$title = 'Marks & Gradebook';
include '../includes/header.php';
?>

<h1 class='page-title'>Marks &amp; Gradebook</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Student Grades</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Quiz /20</th>
                    <th>Assignment /20</th>
                    <th>Mid /30</th>
                    <th>Final /30</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Ayesha Khan</td>
                    <td>18</td>
                    <td>19</td>
                    <td>26</td>
                    <td>27</td>
                </tr>

                <tr>
                    <td>Ali Raza</td>
                    <td>15</td>
                    <td>17</td>
                    <td>24</td>
                    <td>25</td>
                </tr>

                <tr>
                    <td>Sara Ahmed</td>
                    <td>19</td>
                    <td>18</td>
                    <td>28</td>
                    <td>28</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Enter Marks (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Student ID
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Assessment
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Marks
                    <input type="number" placeholder="" />
                </label>

                <label class="field ">
                    Total Marks
                    <input type="number" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Marks</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
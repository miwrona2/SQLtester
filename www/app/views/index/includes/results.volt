<table id="results" class="table">
    <caption>Query results table</caption>
    <thead>
        <tr>
            <th ng-repeat="column in columns">{[{ column }]}</th>
        </tr>
    </thead>
    <tbody>
    <tr ng-repeat="row in sqlresults">
        <td ng-repeat="column in columns">{[{ row[column] }]}</td>
    </tr>
    </tbody>
</table>
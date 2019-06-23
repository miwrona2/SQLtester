<table id="books" class="table table-striped" ng-init="getBooks()">
    <caption>Database table 'Book'</caption>
    <thead class="thead-dark">
    <tr>
        <th>Lp.</th>
        <th>id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre Id</th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="(key, book) in books">
        <th>{[{ key }]}</th>
        <td>{[{ book.id }]}</td>
        <td>{[{ book.title }]}</td>
        <td>{[{ book.author }]}</td>
        <td>{[{ book.genre_id }]}</td>
    </tr>
    </tbody>
</table>

<table id="genres" class="table table-striped" ng-init="getGenres()">
    <caption>Database table 'Genre'</caption>
    <thead class="thead-dark">
    <tr>
        <th>Lp.</th>
        <th>Id</th>
        <th>Fullanem</th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="(key, genre) in genres">
        <th>{[{ key }]}</th>
        <td>{[{ genre.id }]}</td>
        <td>{[{ genre.fullname }]}</td>
    </tr>
    </tbody>
</table>
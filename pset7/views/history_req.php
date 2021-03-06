<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">Type</th>
                <th class="text-center">Date</th>
                <th class="text-center">Symbol</th>
                <th class="text-center">Shares</th>
                <th class="text-center">Price</th>
                <th class="text-center">TOT</th>
            </tr>
        </thead>
        <tbody>
            <tr class="info">
                <td> </td>
                <td> </td>
                <td>CASH</td>
                <td> </td>
                <td> </td>
                <td> <?= "$".$cash ?> </td>
            </tr>
            
            <?php foreach ($hists as $his): ?>
                <?php if ($his["type"] === "d") : ?>
                <tr class="info">
                    <td>Deposit</td>
                    <td><?= $his["date"] ?></td>
                    <td> CASH </td>
                    <td> </td>
                    <td> </td>  
                    <td><?= number_format($his["price"],2) ?></td>
                </tr>
                
                <?php else : ?>
                <tr <?php if ($his["type"] === "b") echo "class=\"success\""; else echo "class=\"danger\""; ?> >
                    <td><?php if($his["type"] === "b") echo "Buy"; else echo "Sell"; ?></td>
                    <td><?= $his["date"] ?></td>
                    <td><?= strtoupper($his["symbol"]) ?></td>
                    <td><?= $his["shares"] ?></td>
                    <td><?= number_format($his["price"],2) ?></td>  
                    <td><?= number_format(($his["price"]*$his["shares"]),2) ?></td>
                </tr>
                
                <?php endif; ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
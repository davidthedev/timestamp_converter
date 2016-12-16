<!DOCTYPE html>
<html>
<head>
    <title>Timestamp Converter</title>
</head>
<body>
    <header>Timestamp Converter</header>

    <h2>Convert timestamp to date</h2>
    <form name="td" action="index.php" method="GET">
        <input type="text" name="timestamp" placeholder="enter timestamp" value="<?php echo $timestamp; ?>">
        <select name="dateformat">
            <option value="1" <?php echo $dateFormat == 'd-m-Y' ? 'selected' : '' ; ?>>Day - Month - Year (DD-MM-YYYY)</option>
            <option value="2" <?php echo $dateFormat == 'm-d-Y' ? 'selected' : '' ; ?>>Month - Day - Year (MM-DD-YYYY)</option>
            <option value="3" <?php echo $dateFormat == 'Y-m-d' ? 'selected' : '' ; ?>>Year - Month - Day (YYYY-MM-DD)</option>
        </select>
        <input type="submit" name="td-submit" value="Convert timestamp to date">
    </form>

    <h2>Convert date to timestamp</h2>
    <form name="dt" action="index.php" method="GET">
        <input type="text" name="datetime" placeholder="enter date" value="<?php echo $datetime; ?>">
        <input type="submit" name="dt-submit" value="Convert date to timestamp">
    </form>

    <h4>
        <?php echo $output; ?>
    </h4>
</body>
</html>

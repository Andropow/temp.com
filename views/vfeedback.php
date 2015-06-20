<form class="contact_form" method="post" name="contact_form">
    <ul>
        <li>
            <h2>Зворотній звязок</h2>
            <span class="required_notification">* Позначені обовязкові поля</span>
        </li>
        <li>
            <label for="name">Ваше ім’я:</label>
            <input name="client_name" type="text"  placeholder="John Doe" required />
        </li>
        <li>
            <label for="email">Ваш email:</label>
            <input type="email" name="email" placeholder="john_doe@example.com" required />
            <span class="form_hint">Email format "name@something.com"</span>
        </li>
        <li>
            <label for="message">Ваше повідомлення:</label>
            <textarea name="message" cols="40" rows="6" required ></textarea>
        </li>
        <li>
            <button class="submit" type="submit" name="send">Відправити</button>
        </li>
    </ul>   
</form>

    
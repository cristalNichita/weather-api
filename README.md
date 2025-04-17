# ☁️ Laravel Weather API (OpenWeatherMap)

---

## Quick Start

```bash
git clone https://github.com/your-repo/weather-api.git
cd weather-api
composer install
cp .env.example .env
php artisan key:generate
```

---

## .env Configuration

Add your OpenWeatherMap API key to the `.env` file:

```dotenv
OPENWEATHER_API_KEY=your_api_key_here
```

---

## 📡 API Endpoint

```
GET /api/weather?city=Omsk
```

### Successful Response

```json
{
  "city": "Omsk",
  "temperature": 21,
  "description": "clear sky",
  "wind": 3.5,
  "pressure": 751,
  "humidity": 58,
  "cloudiness": 0,
  "icon": "01d"
}
```

### Validation Error

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "city": ["The city field is required."]
  }
}
```

### City Not Found

```json
{
  "success": false,
  "message": "City not found"
}
```

## Running Tests

```bash
php artisan test
```

## Principles Applied

- **SOLID** — layered architecture, dependency injection, abstractions
- **DRY** — no duplication in response handling or validation
- **KISS** — each class has one responsibility
- **Testable** — architecture supports isolated unit testing

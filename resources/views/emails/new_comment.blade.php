<!DOCTYPE html>
<html>
<head>
    <title>Yeni Yorum</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <h2>Yeni Bir Yorum Yapıldı</h2>
    <p><strong>Yazı:</strong> {{ $post->title }}</p>
    <hr>
    <p><strong>Yorum Yapan:</strong> {{ $comment->name }} ({{ $comment->email }})</p>
    <p><strong>Yorum:</strong></p>
    <blockquote style="background: #f9f9f9; padding: 10px; border-left: 5px solid #ccc;">
        {{ $comment->comment }}
    </blockquote>
    <hr>
    <p>Yorumu onaylamak için admin paneline gidin.</p>
    <a href="{{ route('admin.posts.index') }}">Admin Paneli</a>
</body>
</html>
